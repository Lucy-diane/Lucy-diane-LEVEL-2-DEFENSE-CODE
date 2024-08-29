new Vue({
    el: '#app',
    data: {
        totalRevenue: 12345,  // Example revenue in francs
        newTables: 5,         // Example number of new tables
        pendingOrders: 3,    // Example number of pending orders
        orders: [
            { date: '2024-08-26', table: 'Table 1', status: 'Completed', total: 12345 },
            { date: '2024-08-25', table: 'Table 2', status: 'Pending', total: 9876 },
            { date: '2024-08-24', table: 'Table 3', status: 'Processing', total: 8765 }
        ]
    }
});
