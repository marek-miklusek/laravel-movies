<div x-data="scrollProgress" class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-[#e50914]" :style="`width: ${percent}%`"></div>
</div>

<div class="fixed flex flex-col items-center space-y-4 bottom-5 right-5">
    <a href="https://mikijunior.com" target="_blank" class="transition-transform transform hover:scale-125">
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 hover:opacity-100 opacity-50"><g id="SVGRepo_bgCarrier" stroke-width="1"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#fff" d="M628.736 528.896A416 416 0 0 1 928 928H96a415.872 415.872 0 0 1 299.264-399.104L512 704l116.736-175.104zM720 304a208 208 0 1 1-416 0 208 208 0 0 1 416 0z"></path></g></svg>
    </a>
    <a href="https://www.facebook.com/marek.miklusek" target="_blank" class="transition-transform transform hover:scale-125">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white hover:opacity-100 opacity-50" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
        </svg>
    </a>
    <a href="https://github.com/marek-miklusek" target="_blank" class="transition-transform transform hover:scale-125">
        <svg aria-hidden="true" class="w-8 h-8 text-white hover:opacity-100 opacity-50" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"></path>
        </svg>
    </a>
</div>

<script>
    const scrollProgress = () => {
        return {
            init() {
                window.addEventListener('scroll', () => {
                    let winScroll = document.body.scrollTop || document.documentElement.scrollTop
                    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight
                    this.percent = Math.round((winScroll / height) * 100)
                })
            },
            circumference: 30 * 2 * Math.PI,
            percent: 0,
        }
    }
</script>