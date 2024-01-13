@include('posts.header')


<body>


  <div class="settings-container flex-room section">
    <div>
      @if(session('flash_message'))
      <p class="alert alert-success ">{{ session('flash_message') }}</p>
      @endif

      @if (session('error_message'))
      <p class="alert alert-danger">{{ session('error_message') }}</p>
      @endif
      <section>
        <form action="{{ route('config.update') }}" method="post">
          <h2>一般設定</h2>
          <div class="mb-3">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="ユーザー名">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="メールアドレス">
          </div>
          <div class="mb-3">
            <label for="icon" class="form-label">アイコン</label>
            <input type="file" id="icon" name="icon" class="form-control">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">新しいパスワード</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="新しいパスワード">
          </div>
          <div class="mb-3">
            <label for="phone-number" class="form-label">電話番号</label>
            <input type="tel" id="phone-number" name="phone_number" class="form-control" placeholder="電話番号">
          </div>

          @csrf
          <button type="submit" class="save-button">保存する</button>
        </form>

      </section>
    </div>
  </div>

  @include('posts.footer')