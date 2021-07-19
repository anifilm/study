import NotesView from "./NotesView.js";
import NotesAPI from "./NotesAPI.js";

export default class App {
  constructor(root) {
    this.notes = [];
    this.activeNote = null;
    this.view = new NotesView(root, this._handlers());

    this._refeshNotes();
  }

  _refeshNotes() {

  }

  _setNOtes(notes) {

  }

  _setActiveNote(note) {

  }

  _handers() {

  }
}
