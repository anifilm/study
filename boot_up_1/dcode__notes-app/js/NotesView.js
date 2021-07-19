export default class NotesView {
  constructor(root, { onNoteSelect, onNoteAdd, onNoteEdit, onNoteDelete } = {}) {
    this.root = root;
    this.onNoteSelect = onNoteSelect;
    this.onNoteAdd = onNoteAdd;
    this.onNoteEdit = onNoteEdit;
    this.onNoteDelete = onNoteDelete;
    this.root.innerHTML = ``;
  }

  _createListItemHTML(id, title, body, updated) {

  }

  updateNoteList(notes) {

  }

  updateActiveNote(note) {

  }

  updateNotePreviewVisibility(visible) {

  }
}
