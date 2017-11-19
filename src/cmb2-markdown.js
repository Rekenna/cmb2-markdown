const $ = jQuery

$(document).on('input', '.cmb2-markdown .markdown-textarea textarea', function(e){
  const editor = $(e.target)
  const container = editor.parent().parent()
  const convert = container.find('.convert-html');
  const results = container.find('.markdown-result');
  convert.addClass('edited');
  results.html(markdownFormat(editor.val(), false))
});

$(document).on('click', '.cmb2-markdown .convert-html', function(e){
  const target = $(e.target)
  const container = target.parent().parent()
  const editor = container.find('.markdown-textarea textarea')
  const results = container.find('.markdown-result');
  target.removeClass('edited')
  editor.val(results.html());
});

$(document).on('click', '.cmb2-markdown .toggle-preview', function(e){
  const target = $(e.target)
  target.toggleClass('visible')
  const results = target.parent().parent().find('.markdown-result').toggleClass('visible')
});

$(document).on('ready', function(e){
  let hiddenEditors = $('.cmb2-markdown .markdown-textarea textarea');
  for (var i = 0; i < hiddenEditors.length; i++) {
    let editor = $(hiddenEditors[i])
    let container = editor.parent().parent()
    let results = container.find('.markdown-result');
    results.html(markdownFormat(editor.val(), false))
  }
});

function markdownFormat(text, sanitize){
  marked.setOptions({
    renderer: new marked.Renderer(),
    gfm: true,
    tables: true,
    breaks: false,
    pedantic: false,
    sanitize: sanitize,
    smartLists: true,
    smartypants: false
  });
  return marked(text)
}
