<script>
    const table = document.querySelector('.review-table-view')
    const rows = table.querySelectorAll('tr')
    let res = ''
    rows.forEach((row, i) => {
        if(i) {
            const td = row.querySelector('td:nth-child(2)')
            res += td.innerText + "\n"
        }
    })
    console.log(res)
</script>
