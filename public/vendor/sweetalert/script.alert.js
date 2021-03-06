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

// SWEET-ALERT HAPUS SISWA SINGLE
document.addEventListener('livewire:load', function () {
    Livewire.on('deletesiswa', (nis) => {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah anda yakin ?',
            text: 'Siswa ini akan Dihapus Permanent !!!',
            type: "warning",
            showCancelButton: true,
            cancelButtonColor: 'var(--warning)',
            confirmButtonColor: 'var(--danger)',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            //if user clicks on delete
            if (result.value) {
                // calling destroy method to delete
                Livewire.emit('DeleteSiswa', nis);
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelled',
                'Data siswa tidak jadi di hapus :)',
                'error'
                )
            }
        });
    });
});

//SWEET-ALERT HAPUS SISWA SELECTED
Livewire.on('deletesiswaSelected', (param) => {
    Swal.fire({
        icon: param['icon'],
        title:  param['title'],
        text: param['text'],
        type: param['type'],
        showCancelButton: true,
        cancelButtonColor: 'var(--warning)',
        confirmButtonColor: 'var(--danger)',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        //if user clicks on delete
        if (result.value) {
            // calling destroy method to delete
            Livewire.emit('destroyLIstSiswaJs', param['nis']);
            Swal.fire({
            icon:'success',
            title:'Terhapus !!!',
            text:`${param['jmlhListSiswa']} data Siswa berhasil di hapus`,
            confirmButtonColor: 'var(--success)',
            })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
            icon:'error',
            title:'Cancelled',
            text:'Data siswa tidak jadi di hapus :)',
            confirmButtonColor: 'var(--danger)',
            })
        }
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
