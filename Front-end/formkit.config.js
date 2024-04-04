import { generateClasses } from '@formkit/themes'

const config = {
    config: {
        classes: generateClasses({
            global: {
                label: 'block my-2 font-popins font-bold text-title',
                input: 'rounded-md border border-header py-2 px-3 w-[310px] md:w-[420px] mb-2 focus:outline-none',
                message: 'text-red-500 text-sm font-poppins capitalize'
            },
            file: {
                input: 'rounded-md border border-icons border-dashed py-36 px-3 w-full, bg-main',
                noFile: 'block my-2',
                fileItem: 'hidden'
            },
        }),
    }
}

export default config