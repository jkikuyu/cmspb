const path = require("path");
module.exports = {
    devServer: {
        proxy: {
            "^/api": {
                target: "http://localhost:8000/api",
                changeOrigin: true,
                loglevel: "debug",
                pathRewrite: { "^/api": "" },
            },
        },
    },
};
