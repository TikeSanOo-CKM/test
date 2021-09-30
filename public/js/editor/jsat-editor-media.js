class MediaLibrary {
    //メニューバーにアイコンを追加
    static get toolbox() {
        return {
            title: 'Image',
            icon: '<i class="fas fa-images"></i>'
        };
    }

    //プラグインのUI処理
    render() {
        const div = document.createElement('div');
        const input = document.createElement('input');

        //画像URLが貼り付けられた時の処理
        input.addEventListener('paste', (event) => {
            const img = document.createElement('img');

            //貼り付けられたURLを取得
            img.src = event.clipboardData.getData('text');
            img.width = 400;

            //ブロックをリセット
            div.innerHTML = '';
            div.appendChild(img);

        });
        div.appendChild(input);

        $('#mediaLibraryModal').modal('show');

        return div;
    }


    //保存時のデータ抽出
    save(data) {
        return {
            url: data.querySelector('img').src
        }
    }
}