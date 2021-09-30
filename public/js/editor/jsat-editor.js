const editor = new EditorJS({
    holder: 'editor',
    tools: {
        header: {
            class: Header,
            config: {
                placeholder: "記事タイトル",
                levels: [2, 3, 4],
                defaultLevel: 3,
            },
            inlineToolbar: true,
        },
        paragraph: {
            class: Paragraph,
            config: {
                placeholder: "自由に入力できます。",
            },
            inlineToolbar: true,
        },
        list: {
            class: List,
            inlineToolbar: true,
        },
        checklist: {
            class: Checklist,
            inlineToolbar: true,
        },
        table: {
            class: Table,
            inlineToolbar: true,
        },
        linkTool: {
            class: LinkTool,
            inlineToolbar: true,
        },
        alert: {
            class: Alert,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+A',
            config: {
                defaultType: 'primary',
                messagePlaceholder: 'Enter something',
            },
        },
        // image: MediaLibrary,
        image: {
            class: InlineImage,
            inlineToolbar: true,
            config: {
                unsplash: {
                    appName: 'JSAT NAVI',
                    clientId: 'kUgeQjfkFE326GXIl_dLV6X0yXlXS0TNkD2O0je_Lxc'
                }
            }
        },
        underline: Underline,
        AnyButton: {
            class: AnyButton,
            inlineToolbar: false,
            config: {
                css: {
                    "btnColor": "btn-dribbble",
                }
            }
        },
        Color: {
            class: ColorPlugin,
            config: {
                colorCollections: ['#FF1300', '#EC7878', '#9C27B0', '#673AB7', '#3F51B5', '#0070FF', '#03A9F4', '#00BCD4', '#4CAF50', '#8BC34A', '#CDDC39', '#FFF'],
                defaultColor: '#FF1300',
                type: 'text',
            }
        },
        Marker: {
            class: ColorPlugin,
            config: {
                defaultColor: '#FFBF00',
                type: 'marker',
            }
        },
    },
    i18n: {
        messages: {
            tools: {
                "AnyButton": {
                    'Button Text': 'ボタンテキスト',
                    'Link Url': 'リンクURL',
                    'Set': "設定する",
                    'Default Button': "デフォルト",
                }
            }
        },
    },
    data: {
        blocks: [
            {
                type: "header",
                data: {
                    text: "",
                    level: 2
                }
            },
            {
                type: "paragraph",
                data: {
                    text: "自由に入力できます。"
                }
            },
            // {
            //     type: "image",
            //     data: {
            //         url: "../assets/img/user.png",
            //         caption: "An image from Unsplash",
            //     }
            // }
        ]
    }
});

// メディアライブラリ表示
$('body').on('click', '#image-url', function () {
    $('#mediaLibraryModal').modal('show');
});

// メディアライブラリモーダル表示イベントハンドラ
$('#mediaLibraryModal').on('show.bs.modal', function (e) {
    // チェックボックスのクリックを無効化します。
    $('.image_box .disabled_checkbox').click(function () {
        return false;
    });

    // 画像がクリックされた時の処理です。
    $('img.thumbnail').click(function () {
        var $imageList = $('.image_list');

        // 現在の選択を解除します。
        $imageList.find('img.thumbnail.checked').removeClass('checked');

        // チェックを入れた状態にします。
        $(this).addClass('checked');
    });
    $('#execBtn').on('click', function() {
        var url = $('.image_list').find('img.thumbnail.checked').attr('src');
        if (!url) {
            return;
        }
        $('#image-url').text(url);
        $('#mediaLibraryModal').modal('hide');
        $('#embed-button').click();
    });
});


