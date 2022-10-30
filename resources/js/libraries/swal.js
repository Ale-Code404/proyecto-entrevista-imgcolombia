import Swal from "sweetalert2";

const Toast = Swal.mixin({
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    toast: true
});

export default Toast;
