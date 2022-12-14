const path = require("path");
module.exports = {
    outputDir: path.resolve(__dirname, "static"),
    assetsDir: "assets",
    chainWebpack: (config) => {
        config.performance.maxEntrypointSize(400000).maxAssetSize(400000);
    },
    productionSourceMap: false,
};
