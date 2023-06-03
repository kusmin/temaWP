<?php get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>
<?php get_sidebar(); ?>

<div class="container">
    <h1>Página não encontrada</h1>
    <p>Desculpe, mas a página que você estava tentando visualizar não existe.</p>
    <p>Isso pode ser devido a um link quebrado, uma página que foi removida ou a um erro na digitação do URL.</p>
    <p><a href="<?php echo esc_url(home_url('/')); ?>">Clique aqui</a> para voltar para a página inicial, ou use a pesquisa abaixo para encontrar o que você estava procurando.</p>
    <?php get_search_form(); ?>
</div>

<?php get_footer(); ?>
