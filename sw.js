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
            return cache.addAll(cacheFiles);
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

self.addEventListener('fetch', function(event) {
    console.log('[Service Worker] Fetching ' + event.request.url);

    event.respondWith(
        caches.match(event.request).then(function(response) {
            // Se o pedido for para uma página HTML
            if (event.request.headers.get('Accept').indexOf('text/html') !== -1) {
                // respond with the cached page or go to the network
                return response || fetchAndUpdate(event.request);
            } else {
                // Respond with the cached resource or go to the network
                return response || fetch(event.request);
            }
        })
    );
});

function fetchAndUpdate(request) {
    return fetch(request).then(function(res) {
        // Se a solicitação falhou, jogue um erro
        if (!res.ok) {
            throw new Error('Request failed');
        }

// Se a solicitação for bem-sucedida, adicione a resposta ao cache
        return caches.open(cacheName).then(function(cache) {
            return cache.put(request, res.clone()).then(function() {
                return res;
            });
        });
    }).catch(function(error) {
        console.log('[Service Worker] Request failed: ', error);
        // Você pode retornar um fallback aqui, se desejar
    });
}

