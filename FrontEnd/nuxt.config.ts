// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },

  modules: [
    '@nuxt/eslint',
    '@nuxt/hints',
    '@nuxt/image',
    '@nuxt/scripts',
    '@nuxt/ui',
    '@artmizu/nuxt-prometheus',
    '@bubblesortt/nuxt-es-toolkit',
    '@dargmuesli/nuxt-cookie-control',
    '@nuxtjs/tailwindcss'
  ]
})