
$('.js-accordion-title').on('click', function () {
  //クリックでコンテンツを開閉
  $(this).next().slideToggle(200);
  //矢印の向きを変更
  $(this).toggleClass('open', 200);
}).next().hide();


$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  //モーダルを呼び出すときに使われたボタンを取得
  var recipient = button.data('whatever')
  //data-whatever の値を取得

  //Ajaxの処理はここに

  var modal = $(this)  //モーダルを取得
  modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
  modal.find('.modal-body input#recipient-name').val(recipient) //inputタグにも表示
});

// $(function () {
//   alert('OK!');
// });
