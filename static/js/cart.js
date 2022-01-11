function updateAmount(id, inc) {
    amount = parseInt(document.getElementById(id).value);
    if (inc)
        document.getElementById(id).value = amount + 1;
    else {
        if (amount == 0)
            return
        document.getElementById(id).value = amount - 1;
    }
}