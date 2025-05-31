import { ButtonVariants, buttonTypes, buttonIcons } from '.'
import { Button } from '../../../interfaces/UI/Button'

export function getButtonProps({
  type,
  variant,
  icon,
  rawIcon
}: Button = {}) {
  const resolvedType = type && type in buttonTypes ? type : null
  if (resolvedType) {
      const typeData = buttonTypes[resolvedType]
      const resolvedIconKey = icon ?? (typeData.icon as keyof typeof buttonIcons)
      const resolvedIcon = rawIcon ?? (resolvedIconKey in buttonIcons ? buttonIcons[resolvedIconKey] : null)
      return {
        icon: resolvedIcon ?? null,
        variant: variant ?? (typeData.variant as ButtonVariants['variant']),
      }
  }else{
    return {
      icon: icon,
      variant: variant ?? 'default',
    }
  }
}
