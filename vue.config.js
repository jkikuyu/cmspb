module.exports = {
    devServer: {
        proxy: {
            "^/api": {
                target: "https://cmspb.herokuapp.com/",
                changeOrigin: true,
                loglevel: "debug",
                pathRewrite: { "^/api": "/" },
            },
        },
    },
};
