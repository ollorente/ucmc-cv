
    <script src="https://kit.fontawesome.com/41b4e68409.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/jquery.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/service-worker.js') ?>"></script>
    <script>
        const webInspector = document.querySelector('.__web-inspector-hide-shortcut__');
        webInspector.style.display = 'none !important';

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('<?= base_url("assets/service-worker.js") ?>');
            });
        }
    </script>
</body>

</html>