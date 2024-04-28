function copyContent(input) {
    var textarea = document.createElement('textarea');
    textarea.value = input;
    textarea.style.position = 'fixed';
    textarea.style.left = '-9999px';
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    alert('copy thành công !');
  }
  