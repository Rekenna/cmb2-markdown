const $ = jQuery

$(document).on('input', '.cmb2-markdown textarea.markdown-content', function(e){
  const editor = $(e.target)
  const container = editor.parent().parent()
  const field = container.find('.hidden-field textarea')
  const results = container.find('.markdown-result');
  field.html(marked(editor.val()))
  results.html(marked(editor.val()))
});

$(document).on('click', '.cmb2-markdown .toggle-preview', function(e){
  const target = $(e.target)
  target.toggleClass('visible')
  const results = target.parent().parent().find('.markdown-result').toggleClass('visible')
});
