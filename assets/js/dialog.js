const actionsTable = ["create", "edit", "remove"];

actionsTable.forEach((action) => {
  const dialogForm = document.querySelector(
    `.dialog-form[data-action="${action}"]`
  );

  const buttonOpenDialog = document.querySelector(
    `.open-dialog[data-action="${action}"]`
  );

  try {
    buttonOpenDialog.onclick = () => {
      dialogForm.showModal();
    };
  } catch (error) {
    if (error instanceof TypeError)
      console.warn("Nem todas as data-actions foram atribuídas");
  }
});
