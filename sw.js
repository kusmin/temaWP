// Defina um nome para o cache atual
var cacheName = 'v1';

// Padrão de URLs para pré-cache
var cacheFiles = [
    '/',
    '/wp-content/themes/dev/assets/css/bootstrap.min.css',
    '/wp-content/themes/dev/assets/js/bootstrap.min.js',
    '/wp-content/themes/dev/assets/js/main.min.js',
    '/wp-content/themes/dev/assets/css/custom.min.css',
    '/wp-content/themes/dev/assets/css/dark.min.css',
    '/wp-content/themes/dev/assets/css/light.min.css',
]

self.addEventListener('install', function(e) {
    console.log('[ServiceWorker] Installed');

    // Espera até o evento de instalação ser finalizado
    e.waitUntil(

        // Abre o cache atual
        caches.open(cacheName).then(function(cache) {

            console.log('[ServiceWorker] Caching cacheFiles');
            try {
                return cache.addAll(cacheFiles);
            } catch (error) {
                console.log(error)
            }


        })
    );
});


self.addEventListener('activate', function(e) {
    console.log('[ServiceWorker] Activated');

    e.waitUntil(

        // Pega todas as chaves de cache (nome do cache)
        caches.keys().then(function(cacheNames) {
            return Promise.all(cacheNames.map(function(thisCacheName) {

                // Se um nome de cache armazenado não for igual ao nosso cache atual...
                if (thisCacheName !== cacheName) {

                    // Exclui o cache antigo
                    console.log('[ServiceWorker] Removing Cached Files from Cache - ', thisCacheName);
                    return caches.delete(thisCacheName);
                }
            }));
        })
    );
});


self.addEventListener('fetch', function(e) {
    console.log('[ServiceWorker] Fetching', e.request.url);

    // Intercepta a solicitação de fetch
    e.respondWith(
        // Verifica se a solicitação de fetch já existe no cache
        caches.match(e.request).then(function(response) {

            // Se a solicitação de fetch estiver no cache, retorna a resposta do cache
            if ( response ) {
                console.log("[ServiceWorker] Found in Cache", e.request.url, response);
                return response;
            }

            // Se a solicitação de fetch não estiver no cache, retorna a solicitação de fetch para a rede
            return fetch(e.request);
        })
    );
});

