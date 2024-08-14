<style>
    /* Estilos específicos para la página de productos */
    .custom-filter-section {
        border-right: 1px solid #ddd;
        padding: 20px;
    }

    .custom-filter-section h5 {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .custom-filter-section .list-group-item {
        border: none;
        padding: 5px 0;
        cursor: pointer;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .custom-filter-section .list-group-item:hover {
        background-color: #f1f1f1;
    }

    .custom-product-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: box-shadow 0.3s ease-in-out;
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .custom-product-card img {
        width: 100%;
        height: 250px;
        /* Tamaño fijo para las imágenes */
        object-fit: cover;
        transition: transform 0.3s ease;
        border-bottom: 1px solid #ddd;
    }

    .custom-product-card:hover img {
        transform: scale(1.05);
    }

    .custom-card-body {
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-end;
        min-height: 100px;
        /* Espacio para el texto */
    }

    .custom-card-title {
        font-size: 1rem;
        font-weight: normal;
        color: #333;
        margin-bottom: 5px;
        text-align: left;
    }

    .custom-price-container {
        display: flex;
        align-items: baseline;
        gap: 5px;
        margin-top: auto;
        /* Empujar al fondo */
    }

    .custom-price {
        color: #007bff;
        font-size: 1rem;
        font-weight: bold;
    }

    .custom-price.discounted {
        text-decoration: line-through;
        color: #777;
        font-size: 0.9rem;
        margin-right: 5px;
    }

    .custom-badge-offer {
        background-color: #e74c3c;
        color: white;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        position: absolute;
        top: 10px;
        left: 10px;
        border-radius: 3px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .custom-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
    }

    .custom-container h3 {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .range-slider {
        margin-top: 10px;
        width: 100%;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .custom-filter-section {
            padding: 10px;
        }

        .custom-product-card {
            margin-bottom: 20px;
        }

        .custom-card-title {
            min-height: auto;
        }

        .custom-price-container {
            justify-content: flex-start;
        }

        .custom-container {
            margin: 10px;
            padding: 10px;
        }

        .custom-sort-dropdown {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>