/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            spacing: {
                '1px': '1px',
                '2px': '2px',
                '3px': '3px',
                '4px': '4px',
                '5px': '5px',
                '6px': '6px',
                '7px': '7px',
                '8px': '8px',
                '9px': '9px',
                '10px': '10px',
                '12px': '12px',
                '15px': '15px',
                '16px': '16px',
                '18px': '18px',
                '20px': '20px',
                '24px': '24px',
                '45px': '45px',
                '65px': '65px',
                '80px': '80px',
                '300px': '300px',
            },
            fontSize: {
                '24px': '24px',
            },
            colors: {
                'regal-blue': '#007edf',
            },
            dropShadow: {
                'shadow': '0 35px 35px rgba(0, 0, 0, 0.25)',
            }
        },
    },
    plugins: [],
}
