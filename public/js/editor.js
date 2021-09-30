$(function () {
    // 別タイプの引用ボックス
    // Quoteを継承することで使用可
    class Box extends Quote {
      static get toolbox() {
        return {
          title: 'Box',
          icon: 'Box'
        };
      }
    }

    const editor = new EditorJS({
      holder: 'editor',
      autofocus: false,
      tools: {
        header: {
          class: Header,
          config: {
            levels: [1, 2, 3],
            defaultLevel: 1,
          }
        },
        quote: Quote,
        box: Box,
        table: Table,
        image: {
          class: ImageTool,
          config: {
            endpoints: {
              byFile: '/byFile',
              byUrl: '/byUrl',
            },
            additionalRequestHeaders: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          }
        },
        Color: {
          class: ColorPlugin,
          config: {
            colorCollections: ['#000', '#FF1300', '#EC7878', '#9C27B0', '#673AB7', '#3F51B5', '#0070FF', '#03A9F4', '#00BCD4', '#4CAF50', '#8BC34A', '#CDDC39', '#FFF'],
            defaultColor: '#FF1300',
            type: 'text',
          }
        },
      },
      data: function () {
        // 初期表示時の処理
        const v = $('#content').val();
        return v ? JSON.parse(v) : ''
      }(),
      onReady: function () {
        // トラッキング
      },
      onChange: function () {
        // トラッキング
      }
    });

    $('#submit-btn').on('click', function () {
      editor.save().then((data) => {
        $('#content').val(JSON.stringify(data));
        $('#form').submit();
      });
    });
  });
