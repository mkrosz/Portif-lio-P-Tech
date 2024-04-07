
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */

//customers/Clientes

$('#delete-customer').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('customers');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Cliente: ' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  })

  //Motos

  $('#delete-moto').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('motos');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Moto: ' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  })

  //User/Usuários

  $('#delete-user').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('usuarios');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Usuário: ' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  })