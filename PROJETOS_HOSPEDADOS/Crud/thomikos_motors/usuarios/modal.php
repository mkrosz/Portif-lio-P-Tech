<!-- Modal -->
<style>
  .id {
    margin-left: 0.5rem;
    margin-top: 9px;
  }
  #space {
    margin-left: 0.5rem;
  }
</style>
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <i class="fa-solid fa-triangle-exclamation"></i>
        <h1 id="space" class="modal-title fs-5" id="modalLabel">Excluir Usuário</h1>
        <h5 class="id"><?php echo $usuario['id']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esse usuário?
      </div>
      <div class="modal-footer">
        <a type="button" id="confirm" class="btn btn-secondary" data-bs-dismiss="modal.php" href="delete.php?id=<?php echo $usuario['id']; ?>"><i class="fa-regular fa-circle-check"></i>  Sim</a>
        <button type="button" id="cancel" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

<!-- Script para alterar dinamicamente o título do modal -->
<script>
  // Substitua o título do modal quando ele é mostrado
  document.getElementById('delete-modal').addEventListener('show.bs.modal', function (event) {
    var modalTitle = this.querySelector('.modal-title');
    if (modalTitle) {
      modalTitle.textContent = 'Excluir Usuário';
    }
  });
</script>

<script>
  // Adiciona um ouvinte de evento ao botão "Não"
  document.getElementById('cancel').addEventListener('click', function () {
    // Desativa temporariamente a animação do modal
    document.getElementById('delete-modal').style.transition = 'none';

    // Fecha o modal imediatamente
    document.getElementById('delete-modal').classList.remove('show');
    document.body.classList.remove('modal-open');

    // Reativa a animação após um curto intervalo de tempo
    setTimeout(function () {
      document.getElementById('delete-modal').style.transition = '';
    }, 100); // 300ms é o tempo de duração da animação do modal, ajuste conforme necessário
  });
</script>
