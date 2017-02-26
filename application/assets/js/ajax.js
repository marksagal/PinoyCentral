class Ajax
{
    constructor()
    {
    }

    get(oData, sUrl, iTimeout = 8000)
    {
        return new Promise((resolve, reject) => {
            this.request({
                method: 'GET',
                url: sUrl,
                data: oData
            })
            .then((oResponse) => {
                resolve(oResponse);
            })
            .catch((oResponse) => {
                reject(oResponse);
            });
        }, iTimeout);
    }

    request(oParams, iTimeOut = 8000)
    {
        return new Promise((resolve, reject) => {
            var timeout = () => {
                reject('Request Timeout');
            }
            setTimeout(timeout, iTimeOut);
            $.ajax({
                method: oParams.method,
                url: oParams.url,
                data: oParams.data,
                dataType: 'JSON',
                success: (oResponse) => {
                    clearTimeout(timeout);
                    resolve(oResponse);
                }
            });
        });
    }
}
