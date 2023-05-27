<footer class="footer mt-5 py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left">
                <span class="text-muted">&copy; <?php echo date('Y'); ?> - Updev. Todos os direitos reservados.</span>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right">
                <a href="<?php echo get_option('facebook_url', '#'); ?>" class="text-dark mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo get_option('instagram_url', '#'); ?>" class="text-dark mx-2"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo get_option('linkedin_url', '#'); ?>" class="text-dark mx-2"><i class="fab fa-linkedin"></i></a>
                <a href="<?php echo get_option('twitter_url', '#'); ?>" class="text-dark mx-2"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo get_option('github_url', 'https://github.com/kusmin'); ?>" class="text-dark mx-2"><i class="fab fa-github"></i></a>

            </div>
        </div>
    </div>
</footer>


<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsletterModalLabel">Inscreva-se na nossa Newsletter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="newsletterEmail" class="form-label">Endereço de Email</label>
                        <input type="email" class="form-control" id="newsletterEmail">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Inscrever</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php wp_footer(); ?>

<script>
    jQuery(document).ready(function() {
        // Checa se o usuário já fechou o modal
        if (!localStorage.getItem('modalClosed')) {
            // Exibe o modal
            jQuery('#newsletterModal').modal('show');
        }

        // Quando o modal for fechado, salva uma flag no localStorage
        jQuery('#newsletterModal').on('hide.bs.modal', function() {
            localStorage.setItem('modalClosed', true);
        });

        // Obtém os botões de tema
        const lightThemeButton = jQuery('.theme-button.light');
        const darkThemeButton = jQuery('.theme-button.dark');

        // Aplica o tema escolhido na última visita
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.documentElement.setAttribute('data-theme', savedTheme);
            if (savedTheme === 'dark') {
                darkThemeButton.addClass('active');
            } else {
                lightThemeButton.addClass('active');
            }
        }

        // Adiciona evento de clique aos botões de tema
        lightThemeButton.click(function() {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            lightThemeButton.addClass('active');
            darkThemeButton.removeClass('active');
        });

        darkThemeButton.click(function() {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            darkThemeButton.addClass('active');
            lightThemeButton.removeClass('active');
        });
    });
</script>

</body>
</html>


