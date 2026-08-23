const DEFAULT_OPTIONS = {
    title: 'Share',
    medias: [
        'Whatsapp',
        'Facebook',
        'Twitter',
        'Reddit'
    ],
    message: '',
    url: '',
    imageName: 'shared-image.png'
};


const ICON_MAP = {
    Whatsapp: 'WhatsApp',
    Facebook: 'Facebook',
    Twitter: 'X',
    Reddit: 'Reddit'
};


const STYLE_DOM_MEDIA_SHARE = `
    #dom-media-share-modal {
        position: fixed;
        inset: 0;
        z-index: 99999;

        display: none;
        align-items: center;
        justify-content: center;

        padding: 20px;

        background: rgba(0, 0, 0, 0.65);

        box-sizing: border-box;
    }

    #dom-media-share-modal.is-open {
        display: flex;
    }

    #dom-media-share-modal .dom-media-share-dialog {
        width: 100%;
        max-width: 480px;
        max-height: 90vh;

        overflow-y: auto;

        background: #ffffff;

        border-radius: 16px;

        padding: 20px;

        box-sizing: border-box;

        box-shadow:
            0 20px 50px rgba(0, 0, 0, 0.25);
    }

    #dom-media-share-modal .dom-media-share-header {
        display: flex;

        align-items: center;
        justify-content: space-between;

        margin-bottom: 15px;
    }

    #dom-media-share-modal .dom-media-share-title {
        margin: 0;

        font-size: 20px;
        font-weight: 700;
    }

    #dom-media-share-modal .dom-media-share-close {
        width: 36px;
        height: 36px;

        border: 0;

        border-radius: 50%;

        background: #eeeeee;

        cursor: pointer;

        font-size: 20px;

        line-height: 36px;

        text-align: center;
    }

    #dom-media-share-modal .dom-media-share-image {
        display: block;

        width: 100%;
        max-height: 55vh;

        object-fit: contain;

        border-radius: 10px;

        margin-bottom: 18px;
    }

    #dom-media-share-modal .dom-media-share-buttons {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }

    #dom-media-share-modal .dom-media-share-button {
        width: 100%;

        min-height: 48px;

        border: 0;

        border-radius: 10px;

        padding: 10px 15px;

        font-size: 16px;
        font-weight: 600;

        cursor: pointer;
    }

    #dom-media-share-modal .dom-media-share-native {
        background: #198754;
        color: #ffffff;
    }

    #dom-media-share-modal .dom-media-share-whatsapp {
        background: #25D366;
        color: #ffffff;
    }

    #dom-media-share-modal .dom-media-share-facebook {
        background: #1877F2;
        color: #ffffff;
    }

    #dom-media-share-modal .dom-media-share-twitter {
        background: #000000;
        color: #ffffff;
    }

    #dom-media-share-modal .dom-media-share-reddit {
        background: #FF4500;
        color: #ffffff;
    }

    #dom-media-share-modal .dom-media-share-download {
        background: #eeeeee;
        color: #222222;
    }

    #dom-media-share-modal .dom-media-share-button:disabled {
        opacity: 0.6;

        cursor: not-allowed;
    }

    @media (max-width: 576px) {

        #dom-media-share-modal {
            padding: 10px;
        }

        #dom-media-share-modal .dom-media-share-dialog {
            max-height: 95vh;

            padding: 15px;
        }

        #dom-media-share-modal .dom-media-share-image {
            max-height: 55vh;
        }

    }
`;


export class DomMediaShare {

    constructor(
        shareCard,
        shareUrl = '',
        shareMessage = '',
        shareImageName = 'shared-image.png',
        options = {}
    ) {

        if (!shareCard) {
            throw new Error(
                'DomMediaShare: share card element not found.'
            );
        }


        this.shareCard = shareCard;


        this.options = {
            ...DEFAULT_OPTIONS,
            ...options
        };


        this.options.url = shareUrl;

        this.options.message = shareMessage;

        this.options.imageName = shareImageName;


        this.modal = null;

        this.imageData = null;

        this.imageFile = null;

        this.canShareFiles = false;

    }


    /*
     * Main public method
     */

    async share() {

        try {

            this.imageData =
                await this.convertDivToImage();


            /*
             * Build the File object up front,
             * synchronously (no fetch/await),
             * so that later, when the user taps
             * "Share Image" / "Share on WhatsApp",
             * navigator.share() can be called
             * with ZERO awaits before it.
             *
             * iOS Safari revokes "user activation"
             * as soon as an await/microtask happens
             * before navigator.share() is invoked,
             * which is why files silently get dropped
             * and only the text/url get shared.
             */

            this.imageFile =
                this.dataURItoFile(
                    this.imageData,
                    this.options.imageName
                );


            this.canShareFiles = !!(
                navigator.canShare &&
                navigator.share &&
                navigator.canShare({
                    files: [this.imageFile]
                })
            );


            this.openShareDialog(
                this.imageData
            );

        } catch (error) {

            console.error(
                'DomMediaShare image generation error:',
                error
            );

            alert(
                'Unable to create the share image.'
            );

        }

    }


    /*
     * Create the modal
     */

    createModal() {

        if (this.modal) {
            return this.modal;
        }


        this.addStyles();


        const modal =
            document.createElement('div');


        modal.id =
            'dom-media-share-modal';


        modal.innerHTML = `

            <div class="dom-media-share-dialog">

                <div class="dom-media-share-header">

                    <h2 class="dom-media-share-title">
                        ${this.options.title}
                    </h2>

                    <button
                        type="button"
                        class="dom-media-share-close"
                        aria-label="Close"
                    >
                        ×
                    </button>

                </div>


                <img
                    class="dom-media-share-image"
                    alt="Share image"
                >


                <div class="dom-media-share-buttons">

                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-native
                        "
                        data-action="native"
                    >
                        Share Image
                    </button>


                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-whatsapp
                        "
                        data-action="whatsapp"
                    >
                        Share on WhatsApp
                    </button>


                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-facebook
                        "
                        data-action="facebook"
                    >
                        Share on Facebook
                    </button>


                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-twitter
                        "
                        data-action="twitter"
                    >
                        Share on X
                    </button>


                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-reddit
                        "
                        data-action="reddit"
                    >
                        Share on Reddit
                    </button>


                    <button
                        type="button"
                        class="
                            dom-media-share-button
                            dom-media-share-download
                        "
                        data-action="download"
                    >
                        Download Image
                    </button>

                </div>

            </div>

        `;


        document.body.appendChild(
            modal
        );


        this.modal =
            modal;


        const closeButton =
            modal.querySelector(
                '.dom-media-share-close'
            );


        closeButton.addEventListener(
            'click',
            () => this.closeShareDialog()
        );


        modal.addEventListener(
            'click',
            (event) => {

                if (
                    event.target === modal
                ) {

                    this.closeShareDialog();

                }

            }
        );


        const buttons =
            modal.querySelectorAll(
                '[data-action]'
            );


        buttons.forEach(
            (button) => {

                button.addEventListener(
                    'click',
                    () => {

                        this.handleShareAction(
                            button.dataset.action
                        );

                    }
                );

            }
        );


        return modal;

    }


    /*
     * Open modal
     */

    openShareDialog(dataURI) {

        const modal =
            this.createModal();


        const image =
            modal.querySelector(
                '.dom-media-share-image'
            );


        image.src =
            dataURI;


        modal.classList.add(
            'is-open'
        );


        document.body.style.overflow =
            'hidden';

    }


    /*
     * Close modal
     */

    closeShareDialog() {

        if (!this.modal) {
            return;
        }


        this.modal.classList.remove(
            'is-open'
        );


        document.body.style.overflow =
            '';

    }


    /*
     * Handle buttons
     */

    async handleShareAction(action) {

        switch (action) {

            case 'native':

                await this.nativeShare();

                break;


            case 'whatsapp':

                this.shareWhatsApp();

                break;


            case 'facebook':

                this.shareFacebook();

                break;


            case 'twitter':

                this.shareTwitter();

                break;


            case 'reddit':

                this.shareReddit();

                break;


            case 'download':

                this.downloadImage();

                break;

        }

    }


    /*
     * Native Web Share API
     */

    async nativeShare() {

        if (
            !navigator.share
        ) {

            alert(
                'Native sharing is not supported on this browser.'
            );

            return;

        }


        /*
         * CRITICAL: everything below this point,
         * up to and including navigator.share(),
         * must run synchronously with no "await"
         * beforehand. this.imageFile was already
         * built (synchronously, via atob) back in
         * share(), so we can use it here directly
         * without ever calling fetch().
         *
         * Any await/microtask inserted before
         * navigator.share() will make iOS Safari
         * drop the "files" payload silently and
         * fall back to sharing text/url only.
         */

        const file =
            this.imageFile ||
            this.dataURItoFile(
                this.imageData,
                this.options.imageName
            );


        const shareData = {

            title:
            this.options.title,

            text:
            this.options.message,

            url:
            this.options.url

        };


        const canShareWithFile =
            !!(
                navigator.canShare &&
                navigator.canShare({
                    files: [file]
                })
            );


        if (canShareWithFile) {
            shareData.files = [file];
        }


        try {

            await navigator.share(
                shareData
            );

        } catch (error) {

            if (
                error.name ===
                'AbortError'
            ) {
                return;
            }


            console.error(
                'Native share failed:',
                error
            );


            /*
             * Some browsers reject the whole
             * share() call when files+url+text
             * are combined together. Retry with
             * files only as a fallback so the
             * image still goes through.
             */

            if (
                canShareWithFile &&
                shareData.url
            ) {

                try {

                    await navigator.share({
                        files: [file]
                    });

                } catch (retryError) {

                    if (
                        retryError.name !==
                        'AbortError'
                    ) {

                        console.error(
                            'Native share retry failed:',
                            retryError
                        );

                        alert(
                            'Unable to share the image.'
                        );

                    }

                }

            }

        }

    }


    /*
     * WhatsApp
     */

    async shareWhatsApp() {

        /*
         * IMPORTANT PLATFORM LIMITATION:
         *
         * WhatsApp's "wa.me" / "api.whatsapp.com/send"
         * links only ever accept a text string. There is
         * no URL parameter that can attach an image - this
         * is a WhatsApp restriction, not something fixable
         * from the browser side.
         *
         * The ONLY way to hand WhatsApp an image from a
         * web page is through the OS native share sheet
         * (navigator.share with a "files" payload), which
         * lets the user pick WhatsApp as the target app and
         * WhatsApp receives the actual image file.
         *
         * So: if the device supports sharing files, we open
         * the native share sheet (user picks WhatsApp there).
         * Otherwise (desktop, unsupported browsers) we fall
         * back to downloading the image and opening WhatsApp
         * with the text, and tell the user to attach the
         * image manually.
         */

        if (
            navigator.share &&
            this.canShareFiles
        ) {

            await this.nativeShare();

            return;

        }


        this.downloadImage();


        const text =
            `${this.options.message}\n\n${this.options.url}`;


        const url =
            'https://api.whatsapp.com/send?text=' +
            encodeURIComponent(text);


        window.open(
            url,
            '_blank',
            'noopener,noreferrer'
        );


        alert(
            'The image has been downloaded. ' +
            'Attach it in WhatsApp before sending, since ' +
            'WhatsApp links can only carry text, not images.'
        );

    }


    /*
     * Facebook
     */

    shareFacebook() {

        const url =
            'https://www.facebook.com/sharer/sharer.php?' +
            'u=' +
            encodeURIComponent(
                this.options.url
            );


        window.open(
            url,
            '_blank',
            'noopener,noreferrer'
        );

    }


    /*
     * X / Twitter
     */

    shareTwitter() {

        const text =
            this.options.message;


        const url =
            'https://twitter.com/intent/tweet?' +
            'text=' +
            encodeURIComponent(text) +
            '&url=' +
            encodeURIComponent(
                this.options.url
            );


        window.open(
            url,
            '_blank',
            'noopener,noreferrer'
        );

    }


    /*
     * Reddit
     */

    shareReddit() {

        const url =
            'https://www.reddit.com/submit?' +
            'url=' +
            encodeURIComponent(
                this.options.url
            ) +
            '&title=' +
            encodeURIComponent(
                this.options.message
            );


        window.open(
            url,
            '_blank',
            'noopener,noreferrer'
        );

    }


    /*
     * Download PNG
     */

    downloadImage() {

        if (!this.imageData) {
            return;
        }


        const link =
            document.createElement('a');


        link.href =
            this.imageData;


        link.download =
            this.options.imageName;


        document.body.appendChild(
            link
        );


        link.click();


        link.remove();

    }


    /*
     * Convert Data URI to File
     *
     * Deliberately SYNCHRONOUS (uses atob, not
     * fetch/Response.blob()). Calling fetch() on a
     * data: URI still yields a Promise, and awaiting
     * it before navigator.share() is enough for iOS
     * Safari to revoke user-activation and silently
     * drop the "files" payload. Doing the base64
     * decode ourselves avoids that async gap entirely.
     */

    dataURItoFile(
        dataURI,
        filename
    ) {

        const [
            header,
            base64
        ] = dataURI.split(',');


        const mimeMatch =
            header.match(
                /data:(.*?);base64/
            );


        const mime =
            mimeMatch ?
                mimeMatch[1] :
                'image/png';


        const binary =
            atob(base64);


        const bytes =
            new Uint8Array(
                binary.length
            );


        for (
            let i = 0;
            i < binary.length;
            i++
        ) {

            bytes[i] =
                binary.charCodeAt(i);

        }


        return new File(
            [bytes],
            filename,
            {
                type: mime
            }
        );

    }


    /*
     * Add modal CSS
     */

    addStyles() {

        if (
            document.getElementById(
                'dom-media-share-styles'
            )
        ) {
            return;
        }


        const style =
            document.createElement(
                'style'
            );


        style.id =
            'dom-media-share-styles';


        style.textContent =
            STYLE_DOM_MEDIA_SHARE;


        document.head.appendChild(
            style
        );

    }


    /*
     * Convert DOM card to PNG
     */

    convertDivToImage() {

        return new Promise(
            async (resolve, reject) => {

                try {

                    const div =
                        this.shareCard;


                    const width =
                        div.offsetWidth;


                    const height =
                        div.offsetHeight;


                    if (
                        width <= 0 ||
                        height <= 0
                    ) {

                        reject(
                            new Error(
                                'Share card has invalid dimensions.'
                            )
                        );

                        return;

                    }


                    const scale = 2;


                    const canvas =
                        document.createElement(
                            'canvas'
                        );


                    canvas.width =
                        width * scale;


                    canvas.height =
                        height * scale;


                    const ctx =
                        canvas.getContext(
                            '2d'
                        );


                    ctx.scale(
                        scale,
                        scale
                    );


                    const parentRect =
                        div.getBoundingClientRect();


                    /*
                     * Draw card background
                     */

                    const cardStyle =
                        window.getComputedStyle(
                            div
                        );


                    this.drawElementBox(
                        ctx,
                        div,
                        parentRect
                    );


                    /*
                     * Draw child elements
                     */

                    const children =
                        div.querySelectorAll(
                            '*'
                        );


                    const promises = [];


                    children.forEach(
                        (el) => {

                            const style =
                                window.getComputedStyle(
                                    el
                                );


                            const rect =
                                el.getBoundingClientRect();


                            if (
                                rect.width <= 0 ||
                                rect.height <= 0
                            ) {
                                return;
                            }


                            const tag =
                                el.tagName.toLowerCase();


                            /*
                             * Images
                             */

                            if (
                                tag === 'img'
                            ) {

                                promises.push(
                                    this.drawImage(
                                        ctx,
                                        el,
                                        parentRect
                                    )
                                );

                                return;

                            }


                            /*
                             * SVG
                             */

                            if (
                                tag === 'svg'
                            ) {

                                promises.push(
                                    this.drawSvg(
                                        el,
                                        ctx,
                                        parentRect
                                    )
                                );

                                return;

                            }


                            /*
                             * Background / border
                             */

                            this.drawElementBox(
                                ctx,
                                el,
                                parentRect
                            );

                        }
                    );


                    /*
                     * Draw text after backgrounds
                     */

                    div.querySelectorAll(
                        'h1, h2, h3, h4, p, span, strong, small, div'
                    )
                        .forEach(
                            (el) => {

                                if (
                                    !el.innerText ||
                                    !el.innerText.trim()
                                ) {
                                    return;
                                }


                                const style =
                                    window.getComputedStyle(
                                        el
                                    );


                                const rect =
                                    el.getBoundingClientRect();


                                if (
                                    rect.width <= 0 ||
                                    rect.height <= 0
                                ) {
                                    return;
                                }


                                const x =
                                    rect.left -
                                    parentRect.left;


                                const y =
                                    rect.top -
                                    parentRect.top;


                                this.drawText(
                                    ctx,
                                    el,
                                    x,
                                    y
                                );

                            }
                        );


                    await Promise.all(
                        promises
                    );


                    try {

                        resolve(
                            canvas.toDataURL(
                                'image/png'
                            )
                        );

                    } catch (taintError) {

                        reject(
                            new Error(
                                'The share card contains an image ' +
                                'from another domain that does not ' +
                                'allow cross-origin access (CORS), ' +
                                'so the canvas could not be exported. ' +
                                'Serve the image with proper CORS ' +
                                'headers or host it on the same domain.'
                            )
                        );

                    }

                } catch (error) {

                    reject(error);

                }

            }
        );

    }


    /*
     * Draw image
     */

    drawImage(
        ctx,
        imgElement,
        parentRect
    ) {

        return new Promise(
            (resolve) => {

                const draw =
                    (image) => {

                        const rect =
                            imgElement.getBoundingClientRect();


                        const x =
                            rect.left -
                            parentRect.left;


                        const y =
                            rect.top -
                            parentRect.top;


                        ctx.drawImage(
                            image,
                            x,
                            y,
                            rect.width,
                            rect.height
                        );


                        resolve();

                    };


                const image =
                    new Image();


                /*
                 * Cross-origin images (e.g. a logo
                 * served from a CDN) will "taint" the
                 * canvas and make canvas.toDataURL()
                 * throw a SecurityError unless the
                 * server sends CORS headers and we
                 * request the image anonymously.
                 */

                image.crossOrigin =
                    'anonymous';


                image.onload =
                    () => draw(image);


                image.onerror =
                    () => {

                        /*
                         * Retry once without CORS mode.
                         * The image will still draw for
                         * same-origin sources; for a truly
                         * cross-origin, non-CORS image this
                         * will taint the canvas, but at
                         * least the layout won't be blank.
                         */

                        const fallback =
                            new Image();


                        fallback.onload =
                            () => draw(fallback);


                        fallback.onerror =
                            () => resolve();


                        fallback.src =
                            imgElement.src;

                    };


                image.src =
                    imgElement.src;

            }
        );

    }


    /*
     * Draw SVG
     */

    drawSvg(
        svgElement,
        ctx,
        parentRect
    ) {

        return new Promise(
            (resolve) => {

                try {

                    const svgString =
                        new XMLSerializer()
                            .serializeToString(
                                svgElement
                            );


                    const blob =
                        new Blob(
                            [svgString],
                            {
                                type:
                                    'image/svg+xml;charset=utf-8'
                            }
                        );


                    const url =
                        URL.createObjectURL(
                            blob
                        );


                    const image =
                        new Image();


                    image.onload =
                        () => {

                            const rect =
                                svgElement
                                    .getBoundingClientRect();


                            const x =
                                rect.left -
                                parentRect.left;


                            const y =
                                rect.top -
                                parentRect.top;


                            ctx.drawImage(
                                image,
                                x,
                                y,
                                rect.width,
                                rect.height
                            );


                            URL.revokeObjectURL(
                                url
                            );


                            resolve();

                        };


                    image.onerror =
                        () => {

                            URL.revokeObjectURL(
                                url
                            );

                            resolve();

                        };


                    image.src =
                        url;

                } catch (error) {

                    resolve();

                }

            }
        );

    }


    /*
     * Draw text
     */

    drawText(
        ctx,
        element,
        x,
        y
    ) {

        const style =
            window.getComputedStyle(
                element
            );


        const text =
            element.innerText.trim();


        if (!text) {
            return;
        }


        const fontSize =
            parseFloat(
                style.fontSize
            ) || 16;


        const fontWeight =
            style.fontWeight || '400';


        const fontFamily =
            style.fontFamily ||
            'Arial';


        const fontStyle =
            style.fontStyle ||
            'normal';


        const lineHeight =
            parseFloat(
                style.lineHeight
            ) ||
            fontSize * 1.2;


        ctx.font =
            `${fontStyle} ${fontWeight} ${fontSize}px ${fontFamily}`;


        ctx.fillStyle =
            style.color ||
            '#000000';


        ctx.textBaseline =
            'top';


        /*
         * Ignore text from containers
         * that contain other text elements.
         *
         * This prevents duplicate text.
         */

        const hasTextChild =
            Array.from(
                element.children
            ).some(
                (child) =>
                    child.innerText &&
                    child.innerText.trim()
            );


        if (
            hasTextChild
        ) {
            return;
        }


        const rect =
            element.getBoundingClientRect();


        const textAlign =
            style.textAlign ||
            'left';


        let textX =
            x;


        if (
            textAlign === 'center'
        ) {

            textX =
                x +
                rect.width / 2;


            ctx.textAlign =
                'center';

        } else if (
            textAlign === 'right'
        ) {

            textX =
                x +
                rect.width;


            ctx.textAlign =
                'right';

        } else {

            ctx.textAlign =
                'left';

        }


        ctx.fillText(
            text,
            textX,
            y
        );

    }


    /*
     * Draw background,
     * border and shadow
     */

    drawElementBox(
        ctx,
        element,
        parentRect
    ) {

        const rect =
            element.getBoundingClientRect();


        const style =
            window.getComputedStyle(
                element
            );


        const x =
            rect.left -
            parentRect.left;


        const y =
            rect.top -
            parentRect.top;


        const width =
            rect.width;


        const height =
            rect.height;


        if (
            width <= 0 ||
            height <= 0
        ) {
            return;
        }


        const backgroundColor =
            style.backgroundColor;


        const backgroundImage =
            style.backgroundImage;


        const borderWidth =
            parseFloat(
                style.borderTopWidth
            ) || 0;


        const borderColor =
            style.borderTopColor;


        const borderRadius =
            parseFloat(
                style.borderTopLeftRadius
            ) || 0;


        const hasBackground =
            (
                backgroundColor &&
                backgroundColor !==
                'transparent' &&
                backgroundColor !==
                'rgba(0, 0, 0, 0)'
            ) ||
            (
                backgroundImage &&
                backgroundImage !==
                'none'
            );


        const hasBorder =
            borderWidth > 0 &&
            borderColor &&
            borderColor !==
            'transparent';


        if (
            !hasBackground &&
            !hasBorder
        ) {
            return;
        }


        this.roundedRectPath(
            ctx,
            x,
            y,
            width,
            height,
            borderRadius
        );


        /*
         * Background
         */

        if (hasBackground) {

            const gradient =
                this.parseGradient(
                    backgroundImage,
                    x,
                    y,
                    width,
                    height,
                    ctx
                );


            if (gradient) {

                ctx.fillStyle =
                    gradient;

            } else {

                ctx.fillStyle =
                    backgroundColor ||
                    '#ffffff';

            }


            ctx.fill();

        }


        /*
         * Border
         */

        if (hasBorder) {

            ctx.lineWidth =
                borderWidth;


            ctx.strokeStyle =
                borderColor;


            ctx.stroke();

        }

    }


    /*
     * Draw rounded rectangle
     */

    roundedRectPath(
        ctx,
        x,
        y,
        width,
        height,
        radius
    ) {

        const r =
            Math.min(
                radius,
                width / 2,
                height / 2
            );


        ctx.beginPath();


        ctx.moveTo(
            x + r,
            y
        );


        ctx.lineTo(
            x + width - r,
            y
        );


        ctx.quadraticCurveTo(
            x + width,
            y,
            x + width,
            y + r
        );


        ctx.lineTo(
            x + width,
            y + height - r
        );


        ctx.quadraticCurveTo(
            x + width,
            y + height,
            x + width - r,
            y + height
        );


        ctx.lineTo(
            x + r,
            y + height
        );


        ctx.quadraticCurveTo(
            x,
            y + height,
            x,
            y + height - r
        );


        ctx.lineTo(
            x,
            y + r
        );


        ctx.quadraticCurveTo(
            x,
            y,
            x + r,
            y
        );


        ctx.closePath();

    }


    /*
     * Parse CSS gradient
     */

    parseGradient(
        backgroundImage,
        x,
        y,
        width,
        height,
        ctx
    ) {

        if (
            !backgroundImage ||
            !backgroundImage.includes(
                'gradient'
            )
        ) {
            return null;
        }


        const colors =
            backgroundImage.match(
                /(rgba?\([^)]+\)|#[0-9a-fA-F]{3,8})/g
            );


        if (
            !colors ||
            colors.length < 2
        ) {
            return null;
        }


        let gradient =
            ctx.createLinearGradient(
                0,
                0,
                width,
                height
            );


        colors.forEach(
            (color, index) => {

                gradient.addColorStop(
                    index /
                    (colors.length - 1),

                    color
                );

            }
        );


        return gradient;

    }

}