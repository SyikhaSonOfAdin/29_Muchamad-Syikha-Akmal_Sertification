AOS.init({
    duration: 1200,
})

const table = document.getElementById('mainContent') ;
const load = '<div class="w-full h-full flex justify-center items-center"><img src="../Assets/Rolling-1s-200px.svg" alt="" class="w-5"></div>'

async function getTabel() {
    try {
        const response = await fetch('../Model/getHome.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: 'gettingDashboard=' + true 
        })
        if (response.ok) {
            const data = await response.text() ;
            table.innerHTML = data
        }
    } catch (error) {
        console.log(error)
    }
}

function getDashboard() {
    getTabel() ;
    table.innerHTML = load ;
}

getDashboard() ;