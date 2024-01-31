const CACHE_NAME = 'your-cache-name';
const urlsToCache = [
  '/',
  'index.html',
  './assets/favicon/site.webmanifest',
  './assets/favicon/android-chrome-512x512.png'
  // Add other files and routes to cache as needed
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});
