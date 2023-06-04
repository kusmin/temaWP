<footer class="footer mt-5 py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left">
                <span class="text-muted">&copy; <?php echo date('Y'); ?> - Updev. Todos os direitos reservados.</span>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right">
                <a href="<?php echo get_option('facebook_url', '#'); ?>" class="text-dark mx-2" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo get_option('instagram_url', '#'); ?>" class="text-dark mx-2" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo get_option('linkedin_url', '#'); ?>" class="text-dark mx-2" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="<?php echo get_option('twitter_url', '#'); ?>" class="text-dark mx-2" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo get_option('github_url', 'https://github.com/kusmin'); ?>" class="text-dark mx-2" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="<?php echo get_option('linkedin_url', '#'); ?>" class="text-dark mx-2" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="<?php echo get_option('youtube_url', '#'); ?>" class="text-dark mx-2" aria-label="YouTube"><i class="fab fa-youtube"></i></a>

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
                        <label class="label-modal" for="newsletterEmail" class="form-label">Endereço de Email</label>
                        <input type="email" class="form-control" id="newsletterEmail">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Inscrever</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para alterar o tamanho da fonte -->
<div class="modal fade" id="fontSizeModal" tabindex="-1" aria-labelledby="fontSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fontSizeModalLabel">Alterar configurações da fonte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="label-modal" for="font-size">Selecione o tamanho da fonte</label>
                    <select class="form-control" id="font-size">
                        <option value="1rem">Pequena</option>
                        <option value="1.25rem">Média</option>
                        <option value="1.5rem">Grande</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-modal" for="font-family">Selecione o tipo de fonte</label>
                    <select class="form-control" id="font-family">
                        <option value="Arial">Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <!-- Adicione mais opções de fonte aqui -->
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveFontSettings">Salvar</button>
            </div>
        </div>
    </div>
</div>




<?php wp_footer(); ?>

<script>
     
    jQuery(document).ready(function() {

    document.getElementById('saveFontSettings').addEventListener('click', function() {
    var selectedFontSize = document.getElementById('font-size').value;
    var selectedFontFamily = document.getElementById('font-family').value;
    document.body.style.fontSize = selectedFontSize;
    document.body.style.fontFamily = selectedFontFamily;
    localStorage.setItem('userFontSize', selectedFontSize);
    localStorage.setItem('userFontFamily', selectedFontFamily);
    fontSizeModal.hide();
    });

    // Quando a página é carregada, defina o tamanho e tipo da fonte para a preferência do usuário, se disponível
    window.onload = function() {
        var userFontSize = localStorage.getItem('userFontSize');
        var userFontFamily = localStorage.getItem('userFontFamily');
        if (userFontSize) {
                document.body.style.fontSize = userFontSize;
            document.getElementById('font-size').value = userFontSize;
        }
        if (userFontFamily) {
            document.body.style.fontFamily = userFontFamily;
            document.getElementById('font-family').value = userFontFamily;
        }
    }



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


