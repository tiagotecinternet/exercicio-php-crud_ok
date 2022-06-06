const linksExclusao = document.querySelectorAll('.excluir');

for (const link of linksExclusao) {
    link.addEventListener('click', function(event) {
    event.preventDefault();
    let resposta = confirm("Tem certeza que deseja excluir este aluno?");
    if (resposta) {
        location.href = this.getAttribute('href');
    }
  });  
}