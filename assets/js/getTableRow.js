const editIcons = document
  .querySelectorAll(`table tbody tr img[data-action='edit']`);
const removeIcons = document
  .querySelectorAll(`table tbody tr img[data-action='remove']`);

editIcons.forEach((icon) => {
  icon.onclick = () => {
    const tableRow = icon.closest("tr");
    console.dir(tableRow.cells);
  };
});

removeIcons.forEach((icon) => {
  icon.onclick = () => {
    const tableRow = icon.closest("tr");
    const dialogFormRemove = document
      .querySelector(`dialog[data-action='remove']`);

    dialogFormRemove.showModal();

    console.dir(tableRow.cells[0]);
  };
});