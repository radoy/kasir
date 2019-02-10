var Global = {
    formatNumber: function (elemid, number) {
        elemid = "#" + elemid;
        this.number = String(number);

        while (/^([^.,]*\d)(\d{3}([.,]|$))/.test(this.number)) {
            this.number = this.number.replace(/^([^.,]*\d)(\d{3}([.,]|$))/, "$1" + "." + "$2");
        }

        if ($(elemid)) {
            $(elemid).html("&nbsp;Rp&nbsp;" + this.number);
        }
    },
}