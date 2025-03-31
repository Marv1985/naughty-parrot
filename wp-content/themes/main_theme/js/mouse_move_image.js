// const mouse_move_image = (event) => {
//     let lastX = event.clientX;
//     let lastY = event.clientY;

//     document.addEventListener("mousemove", (event) => {
//         const { clientX, clientY } = event;

//         const deltaX = clientX - lastX; // Movement direction on X axis
//         const deltaY = clientY - lastY; // Movement direction on Y axis

//         document.querySelectorAll(".parallax-img").forEach(img => {
//             const speed = parseFloat(img.getAttribute("data-speed")) || 2;

//             gsap.to(img, {
//                 x: `+=${-deltaX * speed}`, // Always move opposite
//                 y: `+=${-deltaY * speed}`, // Always move opposite
//                 ease: "power2.out",
//                 duration: 0.5
//             });
//         });

//         lastX = clientX;
//         lastY = clientY;
//     });
// };

// document.addEventListener("DOMContentLoaded", () => {
//     const mouseMoveImagesElement = document.querySelector(".mouse_move_images");

//     if (mouseMoveImagesElement) {
//         mouseMoveImagesElement.addEventListener("mouseover", mouse_move_image);
//     }
// });
