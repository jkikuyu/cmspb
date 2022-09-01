module.exports = {
    devServer: {
        proxy: {
            "^/api": {
                target: "https://cmspb.herokuapp.com/api",
                changeOrigin: true,
                loglevel: "debug",
                pathRewrite: { "^/api": "" },
            },
        },
    },
};
