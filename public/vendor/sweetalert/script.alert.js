livewire.on("alert-success", (param) => {
    Swal.fire({
        position: param["position"],
        icon: param["icon"],
        title: param["title"],
        html: param["text"],
        timerProgressBar: true,
        showConfirmButton: param["showConfirmButton"],
        timer: param["timer"],
    });
});

livewire.on("alert-confirm", (param) => {
    Swal.fire({
        icon: param['type'],
        title:param['title'],
        html: param['text'],
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText,
        reverseButtons: true,
    }).then((result) => {
        if (result.value) {
            return livewire.emit(method, params);
        }

        if (callback) {
            return livewire.emit(callback);
        }
    });
});



const SwalAlert = (icon, title, timeout = 7000) => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: timeout,
        onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon,
        title,
    });
};

document.addEventListener("DOMContentLoaded", () => {
    this.livewire.on("swal:modal", (data) => {
        SwalModal(data.icon, data.title, data.text);
    });

    this.livewire.on("swal:confirm", (data) => {
        SwalConfirm(
            data.icon,
            data.title,
            data.text,
            data.confirmText,
            data.method,
            data.params,
            data.callback
        );
    });

    this.livewire.on("swal:alert", (data) => {
        SwalAlert(data.icon, data.title, data.timeout);
    });
});
