function build_editbox(id) {
  testid = "#" + id
  CKEDITOR.ClassicEditor.create(document.querySelector(testid), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        "bold",
        "italic",
        "strikethrough",
        "underline",
        "numberedList",
        "todoList",
        "fontSize",
        "fontColor",
        "uploadImage",
      ],
      /*items: [
            'bold', 'italic', 'strikethrough', 'underline', 
            'numberedList', 'todoList', '|',
            'fontSize', 'fontFamily', 'fontColor', '|',
            'link', 'uploadImage', '|',
        ],*/
      shouldNotGroupWhenFull: true,
    },
    placeholder: "Write Your Note",
    fontFamily: {
      options: [
        "default",
        "Arial, Helvetica, sans-serif",
        "Courier New, Courier, monospace",
        "Georgia, serif",
        "Lucida Sans Unicode, Lucida Grande, sans-serif",
        "Tahoma, Geneva, sans-serif",
        "Times New Roman, Times, serif",
        "Trebuchet MS, Helvetica, sans-serif",
        "Verdana, Geneva, sans-serif",
      ],
      supportAllValues: true,
    },
    fontSize: {
      options: [10, 12, 14, "default", 18, 20, 22, 24, 26],
      supportAllValues: true,
    },
    link: {
      decorators: {
        addTargetToExternalLinks: true,
        defaultProtocol: "https://",
      },
    },
    removePlugins: [
      "ExportPdf",
      "ExportWord",
      "CKBox",
      "CKFinder",
      "EasyImage",
      "RealTimeCollaborativeComments",
      "RealTimeCollaborativeTrackChanges",
      "RealTimeCollaborativeRevisionHistory",
      "PresenceList",
      "Comments",
      "TrackChanges",
      "TrackChangesData",
      "RevisionHistory",
      "Pagination",
      "WProofreader",
      "MathType",
    ],
  });
  //setTimeout(function(){    $(".ck-list-styles-dropdown").children().children()[1].remove()}, 900)
}
