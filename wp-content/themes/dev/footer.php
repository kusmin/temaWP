<footer class="footer mt-5 py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left">
                <?php
                    $terms_url = get_option('terms_url', '');
                    $support_url = get_option('support_url', '');
                    $privacy_url = get_option('privacy_url', '');
                    if ( $terms_url !== '' ) {
                        echo '<a href="' . $terms_url . '" class="text-dark mx-2" aria-label="Termos de Uso">Termos de Uso</a>';
                    }
                    if ( $support_url !== '' ) {
                        echo '<a href="' . $support_url . '" class="text-dark mx-2" aria-label="Suporte">Suporte</a>';
                    }

                    if ( $privacy_url !== '' ) {
                        echo '<a href="' . $privacy_url . '" class="text-dark mx-2" aria-label="Política de Privacidade"> Política de Privacidade</a>';
                    }
                ?>
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

<?php if( get_option( 'enable_newsletter' ) == 1 ): ?>
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
<?php endif; ?>

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
                        <option value="Verdana">Verdana</option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Times New Roman">Times New Roman</option>
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

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.min.js"></script>

</body>
</html>


