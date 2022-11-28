import axios from "axios";

//axios.defaults.baseURL = "http://cmspb.herokuapp.com/api/";
axios.defaults.baseURL = "http://localhost:8000/api/";
//axios.defaults.baseURL = "http://172.16.1.17/api/";
let refresh = false;

axios.interceptors.response.use(
    (resp) => resp,
    async (error) => {
        if (error.response.status === 401) {
            //window.location = "/ims/login";
            refresh = true;
            console.log("401");
            Promise.resolve();
        }
        if (!refresh) {
            refresh = true;
            console.log("refresh");
            const { status, data } = await axios.post(
                "refresh",
                {},
                {
                    withCredentials: true,
                }
            );

            if (status === 200) {
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${data.token}`;

                return axios(error.config);
            }
        }
        refresh = false;
        return Promise.reject(error);
    }
);
