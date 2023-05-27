<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-muted">&copy; <?php echo date('Y'); ?> - Updev. Todos os direitos reservados.</span>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                <a href="https://github.com/kusmin" class="text-dark"><i class="fab fa-github"></i></a> <!-- Adicionado link do GitHub -->

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
                    <button type="submit" class="btn btn-primary">Inscrever</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php wp_footer(); ?>

</body>
</html>

<script>
    $(document).ready(function() {
        // Checa se o usuário já fechou o modal
        if (!localStorage.getItem('modalClosed')) {
            // Exibe o modal
            $('#newsletterModal').modal('show');
        }

        // Quando o modal for fechado, salva uma flag no localStorage
        $('#newsletterModal').on('hide.bs.modal', function() {
            localStorage.setItem('modalClosed', true);
        });
    });

    document.getElementById('theme-switcher').addEventListener('change', function() {
    document.cookie = 'theme=' + this.value; // altera o valor do cookie
    location.reload(); // recarrega a página para aplicar o novo tema
});
</script>
