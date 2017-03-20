class Ajax
{
    post(oData, sUrl, iTimeout = 8000)
    {
        return new Promise((resolve, reject) => {
            this._request({
                method: 'POST',
                url: sUrl,
                data: oData
            }, iTimeout)
            .then((oResponse) => {
                resolve(oResponse);
            })
            .catch((oResponse) => {
                reject(oResponse);
            });
        });
    }

    get(oData, sUrl, iTimeout = 8000)
    {
        return new Promise((resolve, reject) => {
            this._request({
                method: 'GET',
                url: sUrl,
                data: oData
            }, iTimeout)
            .then((oResponse) => {
                resolve(oResponse);
            })
            .catch((oResponse) => {
                reject(oResponse);
            });
        });
    }

    _request(oParams, iTimeOut = 8000)
    {
        return new Promise((resolve, reject) => {
            var timeout = setTimeout(() => {
                reject('Request Timeout');
            }, iTimeOut);

            $.ajax({
                method: oParams.method,
                url: oParams.url,
                data: oParams.data,
                dataType: 'JSON',
                success: (oResponse) => {
                    clearTimeout(timeout);
                    resolve(oResponse);
                }
            })
            .fail((e) => {
                reject(e);
            });
        });
    }
}
