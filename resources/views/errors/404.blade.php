<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    *::before,
    *::after {
        content: '';
        position: absolute;
    }

    body {
        background: #1B0034;
        background-image: linear-gradient(135deg, #1B0034 10%, #33265C 100%);
        background-attachment: fixed;
        background-size: cover;

    }

    .error {
        width: 100%;
        height: auto;
        margin: 50px auto;
        text-align: center;
        margin-bottom: 0;
    }

    .dracula {
        width: 330px;
        height: 300px;
        display: inline-block;
        margin: auto;
        overflowX: hidden;
    }

    .error .p {
        color: #C0D7DD;
        font-size: 280px;
        margin: 30px 10px 30px 30px;
        display: inline-block;
        font-family: 'Anton', sans-serif;
        font-family: 'Combo', cursive;
    }


    .con {
        width: 500px;
        height: 500px;
        position: relative;
        margin: 0 auto 0;
        animation: ani9 0.7s ease-in-out infinite alternate;
    }

    @keyframes ani9 {
        0% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(30px);
        }

    }


    .con>* {
        position: absolute;
        top: 0;
        left: 0;
    }

    /* page-ms */
    .page-ms {
        transform: translateY(-50px);
    }

    .error p.page-msg {
        text-align: center;
        color: #C0D7DD;
        font-size: 30px;
        font-family: 'Combo', cursive;
        margin-bottom: 20px;
    }

    button.go-back {
        font-size: 30px;
        font-family: 'Combo', cursive;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: 0.3s linear;
        z-index: 9;
        border-radius: 10px;
        background: #C0D7DD;
        color: #33265C;
        box-shadow: 0 0 10px 0 #C0D7DD;
        margin-top: 20px;
    }

    button:hover {
        box-shadow: 0 0 20px 0 #C0D7DD;
    }
</style>
<div class="container">

    <div class="error">
        <p class="p">4</p>
        <span class="dracula">
            <div class="con">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="350" zoomAndPan="magnify" viewBox="0 0 375 374.999991" height="350" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="2cc612a326"><path d="M 41 59.046875 L 334 59.046875 L 334 316.296875 L 41 316.296875 Z M 41 59.046875 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#2cc612a326)"><path fill="#c0d7dd" d="M 320.574219 142.53125 C 309.863281 137.382812 295.140625 144.179688 282.269531 158.488281 C 282.3125 157.300781 282.355469 156.109375 282.355469 154.90625 C 282.355469 101.949219 239.464844 59.015625 186.582031 59.015625 C 136.121094 59.015625 94.765625 98.105469 91.085938 147.707031 C 78.613281 134.613281 64.679688 128.59375 54.425781 133.523438 C 38.644531 141.109375 37.585938 171.726562 52.046875 201.894531 C 62.1875 223.074219 77.28125 238.375 90.828125 243.035156 L 90.828125 299.933594 C 94.964844 291.589844 103.085938 285.9375 112.40625 285.9375 C 125.953125 285.9375 136.9375 297.871094 136.9375 312.597656 C 136.9375 312.738281 136.921875 312.867188 136.921875 313.011719 L 137.050781 313.011719 C 138.253906 299.503906 148.722656 288.9375 161.464844 288.9375 C 172.765625 288.9375 182.273438 297.238281 185.109375 308.523438 C 187.972656 297.238281 197.464844 288.9375 208.765625 288.9375 C 222.3125 288.9375 233.292969 300.867188 233.292969 315.59375 C 233.292969 315.835938 233.28125 316.082031 233.265625 316.324219 L 233.4375 316.324219 C 234.726562 302.929688 245.152344 292.464844 257.824219 292.464844 C 268.75 292.464844 278 300.25 281.179688 310.976562 C 281.925781 309.46875 282.355469 307.777344 282.355469 305.972656 L 282.355469 252.613281 C 296.34375 248.757812 312.355469 233.027344 322.953125 210.902344 C 337.414062 180.730469 336.355469 150.117188 320.574219 142.53125 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#231f1f" d="M 212.746094 193.5625 C 212.746094 217.28125 200.03125 236.496094 184.363281 236.496094 C 168.683594 236.496094 155.980469 217.28125 155.980469 193.5625 C 155.980469 169.847656 168.683594 150.632812 184.363281 150.632812 C 200.03125 150.632812 212.746094 169.847656 212.746094 193.5625 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ec1b24" d="M 184.363281 201.136719 C 174.925781 201.136719 166.578125 208.105469 161.421875 218.816406 C 166.578125 229.527344 174.925781 236.496094 184.363281 236.496094 C 193.800781 236.496094 202.148438 229.527344 207.304688 218.816406 C 202.148438 208.105469 193.800781 201.136719 184.363281 201.136719 " fill-opacity="1" fill-rule="nonzero"/><path fill="#231f1f" d="M 155.980469 127.847656 C 155.980469 132.378906 152.316406 136.0625 147.789062 136.0625 C 143.265625 136.0625 139.585938 132.378906 139.585938 127.847656 C 139.585938 123.316406 143.265625 119.628906 147.789062 119.628906 C 152.316406 119.628906 155.980469 123.316406 155.980469 127.847656 " fill-opacity="1" fill-rule="nonzero"/><path fill="#231f1f" d="M 229.140625 127.847656 C 229.140625 132.378906 225.460938 136.0625 220.9375 136.0625 C 216.410156 136.0625 212.746094 132.378906 212.746094 127.847656 C 212.746094 123.316406 216.410156 119.628906 220.9375 119.628906 C 225.460938 119.628906 229.140625 123.316406 229.140625 127.847656 " fill-opacity="1" fill-rule="nonzero"/></svg>
            </div>
        </span>
        <p class="p">4</p>

        <div class="page-ms">
            <p class="page-msg"> Oops, page yang kamu cari sepertinya tidak ada. </p>
            <a href="{{route('index')}}"><button class="go-back">Go Back</button></a>
        </div>
    </div>
</div>

<iframe style="width:0;height:0;border:0; border:none;" scrolling="no" frameborder="no" allow="autoplay"
    src="https://instaud.io/_/2Vvu.mp3"></iframe>
