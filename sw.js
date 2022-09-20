//Criando um nome para o arquivo de cache
const staticCache = "meu-desapego-2022-09-20-14-25";

//Lista de arquivos que devem ser cacheados
const files = [
	'/',
	'/acessibilidade.php',
	'/cad_doador.php',
	'/contato.php',
	'/login.php',
	'/sobre.php',
	'/vlibras.php',
	'/bootstrap-5.1.3-dist/',
	'/css/',
	'images/meud.png',
	'images/favicon.ico',
];

//Faz cache dos arquivos ao instalar
this.addEventListener("install", event => {
	this.skipWaiting();

	event.waitUntil(
		caches.open(staticCache)
			.then(cache => {
				return cache.addAll(files);
		})
	)
});

//Limpa o cache antigo
this.addEventListener("activate", event => {
	event.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames
					.filter(cacheName => (cacheName.startsWith('meu-desapego-')))
					.filter(cacheName => (cacheName !== staticCache))
					.map(cacheName => caches.delete(cacheName))
			);
		})
	);
});

//Responde o request direto do cache
this.addEventListener("fetch", event => {
	event.respondWith(
		caches.match(event.request)
			.then(response => {
				//Retorna o cache
				if (response) {
					return response;
				}

				//Faz a requisição
				return fetch(event.request);
			})
			.catch(() => {
				//Mostra uma página de offline
				return caches.match('offline.html');
			})
	)
})