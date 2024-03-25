/** @type {import('vite').UserConfig} */
export default {
  build: {
    assetsDir: "",
    rollupOptions: {
      input: ["resources/css/login-stateless.css"],
      output: {
        assetFileNames: "[name][extname]",
      },
    },
  },
};
