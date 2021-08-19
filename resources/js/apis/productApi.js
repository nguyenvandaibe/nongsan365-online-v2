import baseApi from "./baseApi";
import apiRoutes from "./apiRoutes";

export default {
    /**
     * Get product's of current logged in user
     * @param {string} accessToken
     * @returns array
     */
    getMyProducts(userId) {
        return baseApi.get("/v1/products?owner_id=" + userId);
    },

    getMyProductById(accessToken, productId) {
        return baseApi.get("/v1/user/products/" + productId, {
            headers: {
                Authorization: "Bearer " + accessToken
            }
        });
    },

    /**
     * User submit his/her new product
     * @param {Object} formData
     * @param {string} accessToken
     * @returns
     */
    submitNewProduct(formData, accessToken) {
        return baseApi.post("/v1/products", formData, {
            headers: {
                'Authorization': "Bearer " + accessToken,
                'Content-Type': 'multipart/form-data',
            }
        });
    },

    /**
     * Show an user's product by id
     * @param {int} productId
     * @param {string} accessToken
     * @returns
     */
    showProduct(productId, accessToken) {
        return baseApi.get("/v1/user/products/" + productId, {
            headers: {
                Authorization: "Bearer " + accessToken
            }
        });
    },

    /**
     * Lưu trữ danh sách các nhật ký cho sản phẩm
     * @param {int} productId
     * @param {FormData} formData
     * @param {string} accessToken
     * @returns
     */
    storeDiaryList(productId, formData, accessToken) {
        return baseApi.post(
            apiRoutes.product.storeDiaryList(productId),
            formData,
            {
                headers: {
                    Authorization: "Bearer " + accessToken
                }
            }
        );
    }
};
