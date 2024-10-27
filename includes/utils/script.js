document.querySelectorAll(".delete").forEach((button) => {
  button.addEventListener("click", function () {
    const noteId = this.getAttribute("data-id");
    const form = document.createElement("form");
    form.method = "post";
    form.action = "../controllers/note.controller.php";

    const actionInput = document.createElement("input");
    actionInput.type = "hidden";
    actionInput.name = "action";
    actionInput.value = "delete";
    form.appendChild(actionInput);

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "note_id";
    idInput.value = noteId;
    form.appendChild(idInput);

    document.body.appendChild(form);
    form.submit();
  });
});
