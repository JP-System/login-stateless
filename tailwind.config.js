import forms from "@tailwindcss/forms";
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
  presets: [require("./vendor/wireui/wireui/tailwind.config.js")],

  content: [
    "./resources/views/**/*.blade.php",
    "./vendor/wireui/wireui/src/*.php",
    "./vendor/wireui/wireui/ts/**/*.ts",
    "./vendor/wireui/wireui/src/View/**/*.php",
    "./vendor/wireui/wireui/src/WireUi/**/*.php",
    "./vendor/wireui/wireui/src/resources/**/*.blade.php",
  ],

  theme: {
    extend: {
      colors: {
        primary: colors.teal,
        secondary: colors.neutral,

        background: {
          white: colors.white,
          dark: colors.neutral[800]
        }
      },
    },
  },

  plugins: [forms],
};
