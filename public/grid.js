new gridjs.Grid({
  columns: ["Name", "Email", "Phone Number"],
  pagination: true,
  search: true,
  data: [
    ["John", "john@example.com", "(353) 01 222 3333"],
    ["Mark", "mark@gmail.com", "(01) 22 888 4444"],
  ],
  style: {
    table: {
      border: '3px solid #ccc'
    },
    th: {
      'background-color': 'rgba(0, 0, 0, 0.1)',
      color: '#000',
      'border-bottom': '3px solid #ccc',
      'text-align': 'center'
    },
    td: {
      'text-align': 'center'
    }
  }
}).render(document.getElementById("table-grid"));
